import numpy as np
import pandas as pd
from sklearn import preprocessing
import tkinter as tk

# Create a function to handle the button click event
def calculate_scores():
    # Get the user input
    weights = []
    for i in range(len(criteria)):
        weight = float(weight_entries[i].get())
        weights.append(weight)
    weights = np.array([weights])

    # Calculate the TOPSIS scores
    decision_matrix = np.array([[100, 80, 20, 90], [80, 90, 60, 70], [70, 60, 100, 80], [90, 70, 40, 100]])
    weighted_decision_matrix = decision_matrix * weights
    normalized_decision_matrix = preprocessing.normalize(weighted_decision_matrix, norm='l2', axis=0)
    ideal_best = np.max(normalized_decision_matrix, axis=1)
    ideal_worst = np.min(normalized_decision_matrix, axis=1)
    distance_to_best = np.sqrt(np.sum(np.square(normalized_decision_matrix - ideal_best.reshape(1, -1)), axis=1))
    distance_to_worst = np.sqrt(np.sum(np.square(normalized_decision_matrix - ideal_worst.reshape(1, -1)), axis=1))
    performance_score = distance_to_worst / (distance_to_best + distance_to_worst)
    ranked_alternatives = pd.DataFrame({'Alternative': alternatives, 'Performance score': performance_score}).sort_values('Performance score', ascending=False)
    ranked_alternatives['Weighted score'] = ranked_alternatives['Performance score'] * weights.sum(axis=1)
    overall_score = ranked_alternatives['Weighted score'].sum()
    ranked_alternatives['Overall score'] = overall_score
    ranked_alternatives = ranked_alternatives[['Alternative', 'Overall score']]
    
    # Display the results
    result_text = ranked_alternatives.to_string(index=False)
    result_label.config(text=result_text)

# Define the decision criteria and alternatives
criteria = ['Cost', 'Quality', 'Delivery time', 'Customer support']
alternatives = ['Alternative 1', 'Alternative 2', 'Alternative 3', 'Alternative 4']

# Create the GUI
root = tk.Tk()
root.title("TOPSIS Method")
root.geometry("600x400")

# Create the input labels and entry fields
criteria_labels = []
weight_entries = []
for i in range(len(criteria)):
    criteria_label = tk.Label(root, text=criteria[i])
    criteria_label.grid(row=i, column=0, padx=10, pady=10)
    weight_entry = tk.Entry(root)
    weight_entry.grid(row=i, column=1, padx=10, pady=10)
    criteria_labels.append(criteria_label)
    weight_entries.append(weight_entry)

# Create the calculate button
calculate_button = tk.Button(root, text="Calculate scores", command=calculate_scores)
calculate_button.grid(row=len(criteria), column=0, columnspan=2, padx=10, pady=10)

# Create the result label
result_label = tk.Label(root, text="")
result_label.grid(row=len(criteria)+1, column=0, columnspan=2, padx=10, pady=10)

# Start the GUI
root.mainloop()
