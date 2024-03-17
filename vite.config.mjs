import { v4wp } from '@kucrut/vite-for-wp';

export default {
	plugins: [
		v4wp( {
			input: 'src/scripts/main.ts',
			outDir: `wp-content/themes/${process.env.THEME_SLUG}/dist`, // Optional, defaults to 'dist'.
		} ),
	],
};