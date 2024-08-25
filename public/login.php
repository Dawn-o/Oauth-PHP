<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../src/output.css" rel="stylesheet" />
  <title>Login</title>
</head>

<body class="bg-gray-900 font-body">
  <div class="flex min-h-screen items-center justify-center">
    <div class="bg-gray-800 rounded-lg shadow-lg p-8 max-w-lg w-full">
      <h1 class="text-white text-3xl mb-4 font-semibold">Welcome back</h1>

      <a href="../google_auth.php"
        type="button"
        class="text-gray-400 hover:text-white w-full bg-transparent hover:bg-gray-600 border border-gray-600 focus:ring-4 focus:outline-none ring-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2 justify-center">
        <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" class="w-7 h-7" alt="">
        Log in with Google
      </a>

      <div class="flex items-center text-white mb-4">
        <hr class="w-full border-gray-700" />
        <span class="px-5 text-gray-400">or</span>
        <hr class="w-full border-gray-700" />
      </div>

      <form>
        <div class="mb-4">
          <label for="email" class="block text-white mb-2">Email</label>
          <input
            type="email"
            id="email"
            class="w-full p-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-4">
          <label for="password" class="block text-white mb-2">Password</label>
          <input
            type="password"
            id="password"
            class="w-full p-2 bg-gray-700 text-white rounded-md border border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="flex justify-between items-center mb-4">
          <label class="flex items-center text-white">
            <input
              type="checkbox"
              class="form-checkbox text-blue-500 bg-gray-700 border-gray-600" />
            <span class="ml-2">Remember me</span>
          </label>
          <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
        </div>

        <button
          class="w-full bg-blue-500 text-white font-medium px-4 py-2 rounded-md hover:bg-blue-600">
          Sign in to your account
        </button>
      </form>

      <p class="text-gray-400 text-center mt-4">
        Don’t have an account yet?
        <a href="#" class="text-blue-500 hover:underline">Sign up here</a>
      </p>
    </div>
  </div>
  <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>