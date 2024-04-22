# Use the MySQL image
FROM mysql:latest

# Environment variable
ENV MYSQL_ROOT_PASSWORD=1234
ENV MYSQL_DATABASE=database
ENV MYSQL_USER=user
ENV MYSQL_PASSWORD=1234

# Expose port 3306 (MySQL default port)
EXPOSE 3306