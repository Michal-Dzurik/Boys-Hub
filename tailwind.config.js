module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
        },
        width: {
            '300': '300px',
            '150': '150px',
            '200': '200px',
            '400': '400px',
        },
        height: {
            '300': '300px',
            '400': '400px',
        },
        maxWidth:{
            '300': '300px',
            '150': '150px',
            '200': '200px',
            '400': '400px',
            '650': '650px',
        },
        maxHeight: {
            '300': '300px',
            '400': '400px',
        },
        colors: {
            gray: {
                '850': '#2e3541'
            }
        },

    },
  },
  plugins: [],
}
