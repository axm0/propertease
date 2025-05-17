# PropertEase - Property Management System

![PropertEase Home](./images/Screenshot%202025-05-16%20193710.png)

## Demo Video
https://www.youtube.com/watch?v=AQUwbX385mw

## Overview
PropertEase is a comprehensive property management system designed to help realtors and property seekers connect efficiently. The platform allows users to list, search, and manage properties with an intuitive interface.

## Features

### Property Listings and Search
Browse through available properties with detailed information and images.

![Property Listings](./images/Screenshot%202025-05-16%20193745.png)

### Property Details
View comprehensive details about each property including location, amenities, and contact information.

![Property Details](./images/Screenshot%202025-05-16%20193756.png)

### User Profiles
Manage your profile, track favorite properties, and customize your experience.

![User Profile](./images/Screenshot%202025-05-16%20193856.png)

## Project Setup

### Prerequisites
Before running the project, ensure you have PHP installed on your machine. Detailed instructions on downloading PHP, pulling the project, and setting it up can be found in the `InfoDoc.pdf` and `Enabling_mysqli.pdf` documents.

1. **Read Documentation:** Thoroughly read through `InfoDoc.pdf` first, followed by `Enabling_mysqli.pdf` to understand how to properly set up and run the project.

### Running the Project Locally
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

3. **Access the Application:**
   Open your browser and navigate to: `http://localhost:8000`

### Database Setup
1. **SQL Scripts:**
   The `Create.sql` file contains SQL scripts necessary to create all tables for this database.

2. **Database Configuration:**
   The database connection details are located in the `config.php` file under the `config` folder.

## Application Structure
- `app/` - Contains the application code
  - `Controllers/` - Application controllers
  - `Models/` - Data models
  - `Views/` - UI templates
  - `Core/` - Core framework files
- `config/` - Configuration files
- `public/` - Public accessible files
- `images/` - Application images

## Security Testing

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