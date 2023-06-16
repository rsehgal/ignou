import numpy as np
import matplotlib.pyplot as plt

# Define the mathematical equation
def equation(x):
    return np.sin(x) * np.exp(-0.1 * x**2)
    #return np.sin(x) * np.exp(-0.1 * x)

# Generate x values from 0 to 10 with a step of 0.1
x = np.arange(0, 10, 0.1)

# Evaluate the equation for the corresponding x values
y = equation(x)

# Create the plot
plt.plot(x, y, label='Equation: y = sin(x) * exp(-0.1 * x)')
plt.xlabel('x')
plt.ylabel('y')
plt.title('Plot of a Mathematical Equation')
plt.legend()

# Display the plot
plt.show()

