import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ["Orbitron", "Space Grotesk", "sans-serif"],
        body: ["Space Grotesk", "sans-serif"],
      },
      boxShadow: {
        neon: "0 0 20px rgba(255, 95, 210, 0.25)",
      },
    },
  },
  plugins: [daisyui],
  daisyui: {
    themes: ["synthwave"],
    darkTheme: "synthwave",
  },
};
