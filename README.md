# OAuth 2.0 Using PHP

This project demonstrates how to set up Google OAuth 2.0 authentication using PHP and style your project with Tailwind CSS and Flowbite components.

## Installation

### Step 1: Clone the Repository

Start by cloning the repository to your local environment:

```bash
git clone https://github.com/Dawn-o/Oauth-PHP.git
cd oauth-php
```

### Step 2: Install Tailwind CSS

You have two options for adding Tailwind CSS to your project:

#### Option 1: Install Tailwind CSS via npm

To install Tailwind CSS using npm, run the following command:

```bash
npm install -D tailwindcss
```
This will add Tailwind CSS as a development dependency in your project.

#### Option 2: Use Tailwind CSS via CDN
For a quicker setup, you can use Tailwind CSS via CDN. Add the following link to the <head> section of your HTML file:

```bash
<script src="https://cdn.tailwindcss.com"></script>
```
This will load Tailwind CSS directly from the CDN without the need for npm installation.

### Step 3: Set Up Environment Variables

To configure your `.env` file for OAuth 2.0, follow these steps:

1. **Create OAuth 2.0 Credentials:**

   - Go to the [Google Cloud Console](https://console.cloud.google.com/apis/dashboard).
   - Create a new project or select an existing one.
   - Navigate to "Credentials" and click on "Create Credentials" > "OAuth 2.0 Client ID."
   - Set the **Authorized redirect URI** to:

     ```
     http://localhost/Oauth/function/google_auth.php
     ```

     Adjust this URI if necessary to match your local or production setup.

2. **Update `.env` File:**

   After creating the credentials, you will receive a **Client ID** and **Client Secret**. Add these to your `.env` file along with the redirect URI:

   ```env
   CLIENT_ID='<YOUR_CLIENT_ID>'
   CLIENT_SECRET='<YOUR_CLIENT_SECRET>'
   ```
   Replace <YOUR_CLIENT_ID> and <YOUR_CLIENT_SECRET> with the actual values obtained from Google Cloud Console.

### Step 4: Run the Project

To run the project, you have two options: using XAMPP or the PHP built-in server.

#### Option 1: Using XAMPP

1. **Install and Configure XAMPP:**

   - Download and install [XAMPP](https://www.apachefriends.org/index.html) if you haven't already.
   - Start the Apache and MySQL services from the XAMPP Control Panel.

2. **Move Project to XAMPP Directory:**

   - Move your project directory (e.g., `oauth-php`) to the `htdocs` directory inside your XAMPP installation (usually located at `C:\xampp\htdocs`).

3. **Access the Project:**

   - Open your web browser and navigate to `http://localhost/oauth-php` (or whatever the path is relative to `htdocs`).

4. **Verify OAuth Configuration:**

   - Test the OAuth 2.0 authentication flow to ensure that your setup is correct. Follow the authentication process and check for any errors.

5. **Check for Errors:**

   - Monitor your browser console and XAMPP's Apache error logs for any issues during the authentication process and resolve them as needed.

#### Option 2: Using PHP Built-in Server (Easier Setup)

For a quicker setup without needing XAMPP, you can use PHP’s built-in server:

1. **Start the PHP Built-in Server:**

   - Open your terminal or command prompt.
   - Navigate to your project directory.
   - Run the following command to start the server:

     ```bash
     php -S localhost:8000
     ```

2. **Access the Project:**

   - Open your web browser and go to `http://localhost:8000` to view your project.

3. **Verify OAuth Configuration:**

   - Test the OAuth 2.0 authentication flow to ensure everything is set up correctly.

4. **Check for Errors:**

   - Watch for any errors or issues in the browser console and terminal, and resolve them as needed.



