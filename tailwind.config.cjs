module.exports = {
  content: [
    "./index.php",
    "./**/*.{vue,js,ts,jsx,tsx,}", // ".js"ファイルだけでなく、他のファイルタイプも監視します。
    "./assets/scripts/*.js",
    "./assets/styles/input.css", // assets/stylesフォルダの中のCSSファイルを監視
  ],
  theme: {
    extend: {},
  },
  plugins: [
  ],
};