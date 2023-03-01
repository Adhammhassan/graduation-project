import numpy as np
import pandas as pd
import PySimpleGUI as sg

# Set the theme and styling
sg.theme('DarkBlue2')
# slider_style = {'border_width': 0, 'slider_color': ('#FFFFFF', '#8FBBB9'), 'arrow_color': '#FFFFFF', 'auto_size_text': True}

# Define the decision problem and criteria weights
decision_problem = 'Selecting the best cloud provider for a brokerage system'
criteria = pd.DataFrame({'Criteria': ['Pricing', 'Performance', 'Reliability', 'Security', 'Ease of use'],
                         'User weight': [0.0, 0.0, 0.0, 0.0, 0.0]})

# Get the user's criteria weights
layout = []
for i in range(len(criteria)):
    layout.append([sg.Text(criteria.loc[i, 'Criteria']), sg.Slider(range=(0, 100), orientation='h', size=(30, 10), default_value=0, key=f'criteria{i}')])
layout.append([sg.Button('Submit')])

window = sg.Window('CAB Model', layout)

while True:
    event, values = window.read()
    if event == sg.WINDOW_CLOSED:
        break
    elif event == 'Submit':
        for i in range(len(criteria)):
            criteria.loc[i, 'User weight'] = float(values[f'criteria{i}']) / 100
        break

window.close()

# Define the alternatives and their performance scores
alternatives = pd.DataFrame({
    'Cloud Provider': ['Amazon Web Services','Microsoft Azure','Google Cloud Platform','IBM Cloud','Alibaba Cloud','Oracle Cloud','DigitalOcean','Vultr','Linode','UpCloud','Hetzner Cloud','Scaleway','OVHcloud','Tencent Cloud','IONOS by 1&1','Liquid Web','Rackspace','InMotion Hosting','DreamHost','Hostinger'],
    'Pricing': [0.032,0.034,0.040,0.038,0.040,0.036,0.007,0.010,0.005,0.012,0.006,0.007,0.011,0.040,0.050,0.029,0.036,0.015,0.006,0.009],
    'Performance': [4.5,4.4,4.3,4.6,4.3,4.1,4.6,4.6,4.5,4.6,4.4,4.3,4.4,4.3,4.1,4.6,4.4,4.2,4.0,4.2],
    'Reliability': [4.7,4.6,4.5,4.4,4.4,4.3,4.7,4.7,4.6,4.6,4.5,4.4,4.4,4.4,4.5,4.7,4.5,4.2,4.1,4.1],
    'Security': [4.8,4.6,4.5,4.7,4.6,4.3,4.7,4.8,4.6,4.7,4.5,4.4,4.4,4.4,4.4,4.8,4.4,4.2,4.1,4.2],
    'Ease of use': [4.2,4.4,4.3,4.2,4.2,4.1,4.6,4.5,4.6,4.5,4.4,4.3,4.3,4.3,4.6,4.5,4.2,4.1,4.0,4.4]})


# Perform the MCDM analysis
criteria_matrix = alternatives[criteria['Criteria']].values
criteria_matrix = criteria_matrix.T

criteria_sum = criteria_matrix.sum(axis=1)
criteria_matrix = criteria_matrix / criteria_sum[:, np.newaxis]

criteria_weights = criteria_matrix.mean(axis=1) * criteria['User weight'].values

decision_matrix = alternatives[criteria['Criteria']].values
normalized_decision_matrix = decision_matrix / decision_matrix.sum(axis=0)

weighted_normalized_decision_matrix = normalized_decision_matrix * criteria_weights
ideal_solution = weighted_normalized_decision_matrix.max(axis=0)
negative_ideal_solution = weighted_normalized_decision_matrix.min(axis=0)

positive_distance = np.sqrt(((weighted_normalized_decision_matrix - ideal_solution)**2).sum(axis=1))
negative_distance = np.sqrt(((weighted_normalized_decision_matrix - negative_ideal_solution)**2).sum(axis=1))

relative_closeness = negative_distance / (positive_distance + negative_distance)

ranked_alternatives = alternatives.copy()
ranked_alternatives['Relative closeness'] = relative_closeness
ranked_alternatives = ranked_alternatives.sort_values(by=['Relative closeness'], ascending=False)

# Display the results in a table
results_layout = [[sg.Text('Results')],
                  [sg.Table(values=ranked_alternatives.values.tolist(), headings=ranked_alternatives.columns.tolist(), auto_size_columns=True)]]

sg.Window('Results', results_layout).read(close=True)