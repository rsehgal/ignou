import numpy as np
import cv2

# Set image size and resolution
width, height = 800, 800
max_iter = 256

# Generate an array of complex numbers representing each pixel in the image
x = np.linspace(-2.5, 1.5, width)
y = np.linspace(-2.0, 2.0, height)
X, Y = np.meshgrid(x, y)
Z = X + 1j * Y

# Initialize the image as a blank canvas
image = np.zeros((height, width), dtype=np.uint8)

# Calculate the Mandelbrot set
c = Z.copy()
z = np.zeros_like(Z)
for i in range(max_iter):
    mask = np.abs(z) < 10
    z[mask] = z[mask] ** 2 + c[mask]
    image += mask

# Normalize the image to 0-255 range
image = np.log(image + 1)
image = (255 * image / np.max(image)).astype(np.uint8)

# Display the image
cv2.imshow("Mandelbrot Set", image)
cv2.waitKey(0)
cv2.destroyAllWindows()

