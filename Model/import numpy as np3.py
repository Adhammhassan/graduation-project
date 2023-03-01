import numpy as np
import pandas as pd
from sklearn import preprocessing

# Step 1: Define the decision criteria and establish their relative weights using AHP
criteria = ['Cost', 'Quality', 'Delivery time', 'Customer support']
criteria_weights = np.array([[0.3, 0.2, 0.3, 0.2]])

# Step 2: Create a decision matrix for each alternative, with the criteria weighted according to the weights obtained from the AHP
alternatives = ['Alternative 1', 'Alternative 2', 'Alternative 3', 'Alternative 4']
decision_matrix = np.array([[100, 80, 100, 90], [80, 90, 60, 70], [70, 60, 50, 80], [90, 70, 40, 100]])
weighted_decision_matrix = decision_matrix * criteria_weights

# Step 3: Use the TOPSIS method to evaluate and rank the alternatives based on the weighted decision matrices
normalized_decision_matrix = preprocessing.normalize(weighted_decision_matrix, norm='l2', axis=0)
ideal_best = np.max(normalized_decision_matrix, axis=1)
ideal_worst = np.min(normalized_decision_matrix, axis=1)
distance_to_best = np.sqrt(np.sum(np.square(normalized_decision_matrix - ideal_best.reshape(1, -1)), axis=1))
distance_to_worst = np.sqrt(np.sum(np.square(normalized_decision_matrix - ideal_worst.reshape(1, -1)), axis=1))
performance_score = distance_to_worst / (distance_to_best + distance_to_worst)
ranked_alternatives = pd.DataFrame({'Alternative': alternatives, 'Performance score': performance_score}).sort_values('Performance score', ascending=False)

# Step 4: Calculate the overall score for each alternative by combining the ranking obtained from the TOPSIS method with the weights obtained from the AHP method
ranked_alternatives['Weighted score'] = ranked_alternatives['Performance score'] * criteria_weights.sum(axis=1)
overall_score = ranked_alternatives['Weighted score'].sum()

# Step 5: Rank the alternatives based on their overall scores, with the highest-scoring alternative being the best option
ranked_alternatives['Overall score'] = overall_score
ranked_alternatives = ranked_alternatives[['Alternative', 'Overall score']]
print(ranked_alternatives)