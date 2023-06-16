import numpy as np
import matplotlib.pyplot as plt

# Set the size of the square grid
grid_size = 50

# Set the number of steps in the random walk
num_steps = 50000

# Initialize the starting position at the center of the grid
x = [grid_size // 2]
y = [grid_size // 2]

# Perform the random walk
for _ in range(num_steps):
    # Generate a random direction (0: up, 1: down, 2: left, 3: right)
    direction = np.random.randint(4)
    
    # Update the coordinates based on the chosen direction
    if direction == 0:
        y.append(y[-1] + 1)  # Move up
        x.append(x[-1])
    elif direction == 1:
        y.append(y[-1] - 1)  # Move down
        x.append(x[-1])
    elif direction == 2:
        x.append(x[-1] - 1)  # Move left
        y.append(y[-1])
    elif direction == 3:
        x.append(x[-1] + 1)  # Move right
        y.append(y[-1])

# Create the plot
plt.plot(x, y, marker='.', color='lightgrey')
plt.xlim(0, grid_size)
plt.ylim(0, grid_size)
plt.xlabel('X')
plt.ylabel('Y')
plt.title('Random Walk within a Square')

# Display the plot
plt.show()

