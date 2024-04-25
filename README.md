
# PropertyEase Project Setup

## Prerequisites
Before running the project, ensure you have PHP installed on your machine. Detailed instructions on downloading PHP, pulling the project, and setting it up can be found in the `InfoDoc.pdf` and `Enabling_mysql.pdf` documents.

1. **Read Documentation:** Thoroughly read through `InfoDoc.pdf` first, followed by `Enabling_mysql.pdf` to understand how to properly set up and run the project.

## Running the Project Locally
1. **Navigate to the Public Directory:**
   Ensure that you are in the 'public' directory by navigating to it:
   ```plaintext
   cd path/to/propertease/public
   ```

2. **Start the Local Server:**
   Run the following command to start the PHP server:
   ```bash
   php -S localhost:8000
   ```

## Database Setup
1. **SQL Scripts:**
   The `Create.sql` file contains SQL scripts necessary to create all tables for this database.

2. **Database Configuration:**
   The database connection details are located in the `config.php` file under the `config` folder.
