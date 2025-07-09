<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
  <div class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800]">
      <div class="px-6 py-4">
          <div class="flex justify-center mx-auto">
              <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">
          </div>
  
          <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">STUDENT MANAGEMENT SYSTEM</h3>  
          <form>
              <div class="w-full mt-4">
                  <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="email" placeholder="Username" aria-label="Email Address" />
              </div>
  
              <div class="w-full mt-4">
                  <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="password" placeholder="Password" aria-label="Password" />
              </div>
  
              <div class="flex items-center justify-between mt-4">
                  <a href="#" class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-500">Developed by: Syntax Ngo</a>
  
                  <button class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                      Sign In
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>
</body>
</html>