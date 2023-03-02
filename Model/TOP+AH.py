from tkinter import *
from tkinter import ttk
import numpy as np

# Define the criteria and alternatives
criteria = ['Response Time', 'Cost', 'Storage']
alternatives = ['AWS', 'Alibaba', 'Ibm', 'Blackkite', 'OVH', 'Azure', 'Google cloud', 'Blackbaud', 'VMware', 'Pega cloud']
# Define the performance matrix for the alternatives and criteria
performance_matrix = np.array([[0.2, 0.1, 0.3],
                               [0.3, 0.2, 0.1],
                               [0.1, 0.3, 0.2],
                               [0.4, 0.5, 0.4],
                               [0.3, 0.4, 0.2],
                               [0.4, 0.3, 0.4],
                               [0.2, 0.4, 0.2],
                               [0.1, 0.2, 0.1],
                               [0.2, 0.1, 0.2],
                               [0.1, 0.3, 0.1]])

class Application(Frame):
    def __init__(self, master=None):
        super().__init__(master)
        self.master = master
        self.grid()
        self.create_widgets()

    def create_widgets(self):
        style = ttk.Style()
        style.configure("TLabel", font=("Helvetica", 12))
        style.configure("TButton", font=("Helvetica", 12))

        # Create labels and entry widgets for the criteria weights
        self.label1 = ttk.Label(self, text="Response Time weight:")
        self.label1.grid(row=0, column=0, padx=5, pady=5)
        self.weight1 = ttk.Entry(self)
        self.weight1.grid(row=0, column=1, padx=5, pady=5)

        self.label2 = ttk.Label(self, text="Cost weight:")
        self.label2.grid(row=1, column=0, padx=5, pady=5)
        self.weight2 = ttk.Entry(self)
        self.weight2.grid(row=1, column=1, padx=5, pady=5)

        self.label3 = ttk.Label(self, text="Storage weight:")
        self.label3.grid(row=2, column=0, padx=5, pady=5)
        self.weight3 = ttk.Entry(self)
        self.weight3.grid(row=2, column=1, padx=5, pady=5)

        # Create a button to calculate the rankings
        self.button = ttk.Button(self, text="Calculate rankings", command=self.calculate_rankings)
        self.button.grid(row=3, column=0, columnspan=2, padx=5, pady=5)

        # Create a label to display the rankings
        self.result_label = ttk.Label(self, text="")
        self.result_label.grid(row=4, column=0, columnspan=2, padx=5, pady=5)
    def calculate_rankings(self):
        # Get the criteria weights from the entry widgets
        weight1 = float(self.weight1.get())
        weight2 = float(self.weight2.get())
        weight3 = float(self.weight3.get())
        criteria_weights = np.array([weight1, weight2, weight3])

        # Calculate the weighted performance matrix
        weighted_performance_matrix = performance_matrix * criteria_weights.reshape(1, -1)

        # Calculate the ideal and anti-ideal solutions
        ideal_solution = np.max(weighted_performance_matrix, axis=0)
        anti_ideal_solution = np.min(weighted_performance_matrix, axis=0)

        # Calculate the separation measures
        s_plus = np.sqrt(((weighted_performance_matrix - ideal_solution) ** 2).sum(axis=1))
        s_minus = np.sqrt(((weighted_performance_matrix - anti_ideal_solution) ** 2).sum(axis=1))

        # Calculate the relative closeness to the ideal solution
        relative_closeness = s_minus / (s_plus + s_minus)

        # Rank the alternatives based on relative closeness
        ranked_alternatives = [a for _, a in sorted(zip(relative_closeness, alternatives), reverse=True)]

        # Display the rankings in the label
        self.result_label.config(text="\n".join(ranked_alternatives))

root = Tk()
app = Application(master=root)
app.mainloop()
