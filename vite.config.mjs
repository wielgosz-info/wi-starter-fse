import { v4wp } from '@kucrut/vite-for-wp';

export default {
	plugins: [
		v4wp( {
			input: 'src/scripts/main.ts', // Optional, defaults to 'src/main.js'.
			outDir: 'wp-content/themes/wi-starter-fse/dist', // Optional, defaults to 'dist'.
		} ),
	],
};