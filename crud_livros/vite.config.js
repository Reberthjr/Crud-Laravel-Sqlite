const esbuild = require('esbuild');

esbuild.build({
    entryPoints: ['src/index.js'], // ou o arquivo de entrada do seu projeto
    bundle: true,
    loader: { '.js': 'jsx' },
    outdir: 'dist',
}).catch(() => process.exit(1));
