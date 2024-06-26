# PropertEase Demo Video
https://www.youtube.com/watch?v=AQUwbX385mw
 
# PropertEase Project Setup

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

## Test SQL Injection

### Select Injection Test
This test checks for basic SQL injection vulnerabilities in the login or user search functionalities.
- **Username (with wildcard characters allowed at any position):** `%realtor3%`
   - Note: The percent symbol (`%`) can be placed at the beginning, middle, or end of the string to represent any sequence of zero or more characters.
- **Password:** `' OR '1'='1`

### Update Injection Test
This test checks for vulnerabilities that allow unauthorized updates to user data.
- **Username (with wildcard characters):** `%user@testingserver.com%`
   - Note: Similar to the above, the percent symbol can be used to include any characters before or after the specified pattern.
- **New Password for User:** `anyPassword`
