import numpy as np
import pandas as pd

# Define the criteria
criteria = ['Cost', 'Security', 'Scalability', 'Availability', 'Reliability', 'Performance']

# Assign weights using AHP
ahp_weights = np.array([
    [1, 1/3, 1/5, 1/7, 1/9, 1/3],
    [3, 1, 1/3, 1/5, 1/7, 1/4],
    [5, 3, 1, 1/3, 1/5, 1/3],
    [7, 5, 3, 1, 1/3, 1/2],
    [9, 7, 5, 3, 1, 1/2],
    [3, 4, 3, 2, 2, 1]
])

# Calculate the weights
ahp_weights = np.round(np.mean(ahp_weights, axis=1) / np.sum(np.mean(ahp_weights, axis=1)), 2)
# Define the data for each criterion
cost = np.array([100, 200, 150, 175, 250])
security = np.array([8, 9, 7, 6, 8])
scalability = np.array([1000, 500, 750, 1000, 500])
availability = np.array([99.99, 99.95, 99.99, 99.97, 99.98])
reliability = np.array([99.99, 99.95, 99.99, 99.97, 99.98])
performance = np.array([5000, 6000, 5500, 6500, 5000])

# Normalize the data for each criterion
normalized_data = np.vstack((cost / cost.sum(),
                             security / security.sum(),
                             scalability / scalability.sum(),
                             availability / availability.sum(),
                             reliability / reliability.sum(),
                             performance / performance.sum()))
# Calculate the ideal solution and negative ideal solution
ideal_solution = np.array([np.max(normalized_data, axis=1)])
negative_ideal_solution = np.array([np.min(normalized_data, axis=1)])

# Calculate the distance from each alternative to the ideal solution and negative ideal solution
d_plus = np.sqrt(np.sum((normalized_data - ideal_solution.T) ** 2, axis=0))
d_minus = np.sqrt(np.sum((normalized_data - negative_ideal_solution.T) ** 2, axis=0))

# Calculate the scores for each alternative
scores = d_minus / (d_minus + d_plus)
print(scores)