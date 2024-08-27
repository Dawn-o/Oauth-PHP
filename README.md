# OAuth 2.0 Using PHP

This project demonstrates how to set up Google OAuth 2.0 authentication using PHP and style your project with Tailwind CSS and Flowbite components.

## Installation

### Step 1: Clone the Repository

Start by cloning the repository to your local environment:

```bash
git clone https://github.com/your-username/oauth-php.git
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

To run the project:

1. **Start Your Local Server:**

   Serve your PHP files locally. If you are using a local development server like PHP's built-in server, you can start it with:

   ```bash
   php -S localhost:8000

