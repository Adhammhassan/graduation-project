import numpy as np

# Define the decision criteria and sub-criteria
criteria = ['cost', 'reliability', 'security', 'scalability', 'performance']
sub_criteria = {
    'cost': ['monthly cost', 'hourly cost'],
    'reliability': ['uptime', 'mean time between failures'],
    'security': ['data encryption', 'firewall protection'],
    'scalability': ['horizontal scaling', 'vertical scaling'],
    'performance': ['response time', 'throughput']
}

# Define the alternatives to be evaluated
alternatives = ['Cloud Provider A', 'Cloud Provider B', 'Cloud Provider C']

# Define the performance matrix for each alternative with respect to each criterion
performance_matrix = {
    'Cloud Provider A': {
        'cost': [10, 8],
        'reliability': [0.99, 25000],
        'security': [0.9, 8],
        'scalability': [7, 8],
        'performance': [0.5, 100]
    },
    'Cloud Provider B': {
        'cost': [8, 6],
        'reliability': [0.98, 30000],
        'security': [0.95, 9],
        'scalability': [8, 7],
        'performance': [0.6, 80]
    },
    'Cloud Provider C': {
        'cost': [12, 10],
        'reliability': [0.97, 20000],
        'security': [0.85, 7],
        'scalability': [6, 9],
        'performance': [0.7, 120]
    }
}

# Implement AHP to determine the criteria weights
def ahp(criteria, sub_criteria):
    # Create a pairwise comparison matrix for each set of criteria and sub-criteria
    matrices = {}
    for c in criteria:
        matrices[c] = np.zeros((len(sub_criteria[c]), len(sub_criteria[c])))
        for i in range(len(sub_criteria[c])):
            for j in range(i, len(sub_criteria[c])):
                if i == j:
                    matrices[c][i, j] = 1
                else:
                    weight = float(input("Enter the relative importance of " + sub_criteria[c][i] + " and " + sub_criteria[c][j] + " for " + c + ": "))
                    matrices[c][i, j] = weight
                    matrices[c][j, i] = 1/weight
    
    # Calculate the weights of each criterion based on the pairwise comparison matrices
    weights = {}
    for c in criteria:
        eigenvalues, eigenvectors = np.linalg.eig(matrices[c])
        index = np.argmax(eigenvalues)
        weights[c] = np.real(eigenvectors[:, index])/np.sum(np.real(eigenvectors[:, index]))
    
    return weights

# Calculate the weights of the criteria using AHP
weights = ahp(criteria, sub_criteria)

# Implement TOPSIS to evaluate and rank the cloud service providers
# Implement TOPSIS to evaluate and rank the cloud service providers
def topsis(alternatives, performance_matrix, weights):
    # Normalize the performance matrix to make the criteria comparable
    norm_matrix = {}
    for a in alternatives:
        norm_matrix[a] = {}
        for c in criteria:
            norm_matrix[a][c] = performance_matrix[a][c]/np.sqrt(np.sum(np.power(list(performance_matrix[a][c]), 2)))
    
    # Calculate the weighted normalized matrix
    weighted_norm_matrix = {}
    for a in alternatives:
        weighted_norm_matrix[a] = {}
        for c in criteria:
            weighted_norm_matrix[a][c] = norm_matrix[a][c] * weights[c]
    
    # Calculate the ideal best and worst alternatives for each criterion
    ideal_best = {}
    ideal_worst = {}
    for c in criteria:
        ideal_best[c] = np.max([weighted_norm_matrix[a][c] for a in alternatives])
        ideal_worst[c] = np.min([weighted_norm_matrix[a][c] for a in alternatives])
    
    # Calculate the distance of each alternative from the ideal best and worst alternatives
    d_plus = {}
    d_minus = {}
    for a in alternatives:
        d_plus[a] = np.sqrt(np.sum(np.power([weighted_norm_matrix[a][c] - ideal_best[c] for c in criteria], 2)))
        d_minus[a] = np.sqrt(np.sum(np.power([weighted_norm_matrix[a][c] - ideal_worst[c] for c in criteria], 2)))
    
    # Calculate the performance scores of each alternative
    performance_scores = {}
    for a in alternatives:
        performance_scores[a] = d_minus[a] / (d_plus[a] + d_minus[a])
    
    # Rank the alternatives based on their performance scores
    rankings = sorted(alternatives, key=lambda a: performance_scores[a], reverse=True)
    
    return rankings

# Evaluate and rank the cloud service providers using TOPSIS
rankings = topsis(alternatives, performance_matrix, weights)

# Print the rankings
print("Rankings:")
for i, a in enumerate(rankings):
    print(str(i+1) + ". " + a)

