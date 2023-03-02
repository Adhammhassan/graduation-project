from tkinter import *
from tkinter import ttk
import numpy as np

# Define the criteria and alternatives
criteria = ['Data Encryption', 'Encryption Algorithm', 'Key size', 'Key Generation', 'Key Inventory Management',
            'Data Inventory', 'Data Classification', 'Sensitive Data Transfer', 'Data Retention and Deletion',
            'Sensitive Data Protection', 'Infrastructure and Virtualization Security Policy and Procedures',
            'Network Security', 'Network Defense']
alternatives = ['AWS', 'Alibaba', 'IBM', 'BlackKite', 'OVH', 'Azure', 'Google Cloud', 'Blackbaud', 'VMware',
                'Pega Cloud']

# Define the performance matrix for the alternatives and criteria
performance_matrix = np.array([[0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7],
                               [0.7, 0.6, 0.5, 0.4, 0.3, 0.2, 0.1, 0.8, 0.7, 0.6, 0.5, 0.4, 0.3],
                               [0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8],
                               [0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 0.2, 0.5, 0.6, 0.7, 0.8, 0.9, 0.2],
                               [0.6, 0.7, 0.8, 0.9, 0.2, 0.3, 0.4, 0.7, 0.8, 0.9, 0.2, 0.3, 0.4],
                               [0.8, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6],
                               [0.5, 0.4, 0.3, 0.2, 0.1, 0.8, 0.7, 0.4, 0.3, 0.2, 0.1, 0.8, 0.7],
                               [0.9, 0.8, 0.7, 0.6, 0.5, 0.4, 0.3, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6],
                               [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.6, 0.5, 0.4, 0.3, 0.2, 0.1],
                               [0.8, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6]])
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
        self.label1 = ttk.Label(self, text="Data Encryption weight:")
        self.label1.grid(row=0, column=0, padx=5, pady=5)
        self.weight1 = ttk.Entry(self)
        self.weight1.grid(row=0, column=1, padx=5, pady=5)

        self.label2 = ttk.Label(self, text="Encryption Algorithm weight:")
        self.label2.grid(row=1, column=0, padx=5, pady=5)
        self.weight2 = ttk.Entry(self)
        self.weight2.grid(row=1, column=1, padx=5, pady=5)

        self.label3 = ttk.Label(self, text="Key size weight:")
        self.label3.grid(row=2, column=0, padx=5, pady=5)
        self.weight3 = ttk.Entry(self)
        self.weight3.grid(row=2, column=1, padx=5, pady=5)

        self.label4 = ttk.Label(self, text="Key Generation weight:")
        self.label4.grid(row=3, column=0, padx=5, pady=5)
        self.weight4 = ttk.Entry(self)
        self.weight4.grid(row=3, column=1, padx=5, pady=5)

        self.label5 = ttk.Label(self, text="Key Inventory Management weight:")
        self.label5.grid(row=4, column=0, padx=5, pady=5)
        self.weight5 = ttk.Entry(self)
        self.weight5.grid(row=4, column=1, padx=5, pady=5)

        self.label6 = ttk.Label(self, text="Data Inventory weight:")
        self.label6.grid(row=5, column=0, padx=5, pady=5)
        self.weight6 = ttk.Entry(self)
        self.weight6.grid(row=5, column=1, padx=5, pady=5)

        self.label7 = ttk.Label(self, text="Data Classification weight:")
        self.label7.grid(row=6, column=0, padx=5, pady=5)
        self.weight7 = ttk.Entry(self)
        self.weight7.grid(row=6, column=1, padx=5, pady=5)
        
        self.label8 = ttk.Label(self, text="Sensitive Data Transfer weight:")
        self.label8.grid(row=7, column=0, padx=5, pady=5)
        self.weight8 = ttk.Entry(self)
        self.weight8.grid(row=7, column=1, padx=5, pady=5)
        
        self.label9 = ttk.Label(self, text="Data Retention and Deletion")
        self.label9.grid(row=8, column=0, padx=5, pady=5)
        self.weight9 = ttk.Entry(self)
        self.weight9.grid(row=8, column=1, padx=5, pady=5)
        
        self.label10 = ttk.Label(self, text="Sensitive Data Protection")
        self.label10.grid(row=9, column=0, padx=5, pady=5)
        self.weight10 = ttk.Entry(self)
        self.weight10.grid(row=9, column=1, padx=5, pady=5)
        
        self.label11 = ttk.Label(self, text="Infrastructure and Virtualization Security Policy and Procedures")
        self.label11.grid(row=10, column=0, padx=5, pady=5)
        self.weight11 = ttk.Entry(self)
        self.weight11.grid(row=10, column=1, padx=5, pady=5)
        
        self.label12 = ttk.Label(self, text="Network Security")
        self.label12.grid(row=11, column=0, padx=5, pady=5)
        self.weight12 = ttk.Entry(self)
        self.weight12.grid(row=11, column=1, padx=5, pady=5)
        
        self.label13 = ttk.Label(self, text="Network Defense")
        self.label13.grid(row=12, column=0, padx=5, pady=5)
        self.weight13 = ttk.Entry(self)
        self.weight13.grid(row=12, column=1, padx=5, pady=5)
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
        weight4 = float(self.weight4.get())
        weight5 = float(self.weight5.get())
        weight6 = float(self.weight6.get())
        weight7 = float(self.weight7.get())
        weight8 = float(self.weight8.get())
        weight9 = float(self.weight9.get())
        weight10 = float(self.weight10.get())
        weight11 = float(self.weight11.get())
        weight12 = float(self.weight12.get())
        weight13 = float(self.weight13.get())
        criteria_weights = np.array([weight1, weight2, weight3, weight4, weight5, weight6, weight7, weight8, weight9, weight10, weight11, weight12, weight13])

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
