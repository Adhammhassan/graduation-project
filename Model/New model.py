import numpy as np
import pandas as pd


decision_problem = 'Selecting the best cloud service provider'

criteria = pd.DataFrame({'Criteria': ['Price', 'Storage', 'Bandwidth', 'Scalability', 'Reliability']})

# Prompt the user to input the weights for each criteria
weights = []
for criterion in criteria['Criteria']:
    weight = float(input(f'Enter weight for {criterion}: '))
    weights.append(weight)

criteria['Weight'] = weights

alternatives = pd.DataFrame({'Cloud Service Provider': ['Amazon Web Services', 'Microsoft Azure', 'Google Cloud Platform', 'IBM Cloud'],
                             'Price': [0.0015, 0.0016, 0.0017, 0.0018],
                             'Storage': [500, 500, 500, 500],
                             'Bandwidth': [5, 5, 5, 5],
                             'Scalability': [5, 5, 5, 4],
                             'Reliability': [5, 5, 4, 5]})

criteria_matrix = alternatives[criteria['Criteria']].values
criteria_matrix = criteria_matrix.T

criteria_sum = criteria_matrix.sum(axis=1)
criteria_matrix = criteria_matrix / criteria_sum[:, np.newaxis]

criteria_weights = criteria_matrix.mean(axis=1) * weights

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

print(ranked_alternatives)