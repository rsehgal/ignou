import numpy as np
import matplotlib.pyplot as plt

light_grey = (200, 200, 200)
# Generate the spiral pattern
theta = np.linspace(0, 100 * np.pi, 2000)
radius = theta

x = radius * np.cos(theta)
y = radius * np.sin(theta)

# Create the plot
plt.plot(x, y, color='lightgrey')
plt.xlabel('x')
plt.ylabel('y')
plt.title('Spiral Pattern')
plt.axis('equal')

# Display the plot
plt.show()

