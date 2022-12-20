const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", "./storage/framework/views/*.php", "./resources/views/**/*.blade.php"],

	theme: {
		extend: {
			colors: {
				primary: "#10567A",
				secondary: "#38A4DC",
			},
		},
	},

	// plugins: [require("@tailwindcss/forms")],
};
