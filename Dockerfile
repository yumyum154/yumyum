FROM php:8.1-cli

# Set the working directory
WORKDIR /app

# Copy your application files
COPY . /app

# Expose the port that PHP will run on
EXPOSE 10000

# Command to run the PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000"]
