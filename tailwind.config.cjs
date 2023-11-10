module.exports = {
  content: [
    "./index.php",
    "./header.php",
    "./footer.php",
    "./**/*.{vue,js,ts,jsx,tsx,}", // ".js"ファイルだけでなく、他のファイルタイプも監視します。
    "./assets/scripts/*.js",
    "./assets/styles/input.css", // assets/stylesフォルダの中のCSSファイルを監視
  ],
  theme: {
    extend: {
      fontFamily: {
        'noto-sans': ['Noto Sans JP', 'sans-serif'],
        'kozuka': ['kozuka-gothic-pr6n', 'sans-serif'],

      },
      colors: {
        gold: '#82691B',
      },
      width: {
        '90p': '90%',
        '80p': '80%',
        '70p': '70%',
        '65p': '65%',
      },
    },
  },
  plugins: [
  ],
};