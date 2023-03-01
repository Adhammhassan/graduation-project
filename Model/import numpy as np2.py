import numpy as np

# Define the decision criteria and sub-criteria
criteria = ['Security capabilities', 'Cost', 'Integration', 'Support', 'Reputation', 'Innovation']
sub_criteria = {
    'Security capabilities': ['Access control', 'Data protection', 'Threat detection', 'Compliance management'],
    'Cost': ['Upfront cost', 'Ongoing cost'],
    'Integration': ['Ease of integration', 'Compatibility with existing platforms'],
    'Support': ['Availability of technical support', 'Customer service'],
    'Reputation': ['Track record in industry', 'Customer feedback'],
    'Innovation': ['Cutting-edge technology', 'New service offerings']
}

# Define the pairwise comparison matrix for each sub-criterion
comparison_matrices = {
    'Access control': np.array([[1, 3, 5, 7], [1/3, 1, 3, 5], [1/5, 1/3, 1, 3], [1/7, 1/5, 1/3, 1]]),
    'Data protection': np.array([[1, 3, 5, 7], [1/3, 1, 3, 5], [1/5, 1/3, 1, 3], [1/7, 1/5, 1/3, 1]]),
    'Threat detection': np.array([[1, 3, 5, 7], [1/3, 1, 3, 5], [1/5, 1/3, 1, 3], [1/7, 1/5, 1/3, 1]]),
    'Compliance management': np.array([[1, 3, 5, 7], [1/3, 1, 3, 5], [1/5, 1/3, 1, 3], [1/7, 1/5, 1/3, 1]]),
    'Upfront cost': np.array([[1, 3], [1/3, 1]]),
    'Ongoing cost': np.array([[1, 3], [1/3, 1]]),
    'Ease of integration': np.array([[1, 3], [1/3, 1]]),
    'Compatibility with existing platforms': np.array([[1, 3], [1/3, 1]]),
    'Availability of technical support': np.array([[1, 3], [1/3, 1]]),
    'Customer service': np.array([[1, 3], [1/3, 1]]),
    'Track record in industry': np.array([[1, 3], [1/3, 1]]),
    'Customer feedback': np.array([[1, 3], [1/3, 1]]),
    'Cutting-edge technology': np.array([[1, 3], [1/3, 1]]),
    'New service offerings': np.array([[1, 3], [1/3, 1]])
}

# Calculate the priority weight for each sub-criterion
sub_criteria_weights = {}
for criterion in criteria:
    sub_criteria_weights[criterion] = []
    for sub_criterion in sub_criteria[criterion]:
        matrix = comparison_matrices[sub_criterion]
        n = matrix.shape[0]
        weights = np.zeros(n)
        for i in range(n):
             row_sum = sum(matrix[i,:])
             for j in range(n):
                weights[j] += matrix[i,j]/row_sum
        sub_criteria_weights[criterion].append(weights/sum(weights))

# Calculate the overall priority weight for each criterion
criterion_weights = np.zeros(len(criteria))
for i in range(len(criteria)):
    weight_sum = 0
    for j in range(len(sub_criteria[criteria[i]])):
        weight_sum += sub_criteria_weights[criteria[i]][j][0]
    criterion_weights[i] = weight_sum/len(sub_criteria[criteria[i]])

# Calculate the consistency ratio
eigenvector = np.zeros(len(criteria))
for i in range(len(criteria)):
    eigenvector[i] = sum([sub_criteria_weights[criteria[i]][j][0]*criterion_weights[i] 
                          for j in range(len(sub_criteria[criteria[i]]))])
lambda_max = sum(eigenvector/criterion_weights)/len(criteria)
consistency_index = (lambda_max - len(criteria))/(len(criteria)-1)
random_index = {1: 0, 2: 0, 3: 0.58, 4: 0.9, 5: 1.12, 6: 1.24, 7: 1.32, 8: 1.41, 9: 1.45, 10: 1.49}
consistency_ratio = consistency_index/random_index[len(criteria)]

# Print the results
print("Sub-criteria weights:")
for criterion in criteria:
    print(f"{criterion}:")
    for i in range(len(sub_criteria[criterion])):
        print(f"  {sub_criteria[criterion][i]}: {sub_criteria_weights[criterion][i][0]:.2f}")
print()
print("Criterion weights:")
for i in range(len(criteria)):
    print(f"{criteria[i]}: {criterion_weights[i]:.2f}")
print()
print(f"Consistency ratio: {consistency_ratio:.2f}")

