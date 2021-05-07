# Typescript boilerplate

## init

```
mkdir my-project
cd my-project

# Create source folder and files
mkdir src
touch src/main.ts src/main.test.ts src/cli.ts

# Create a package.json
yarn init

# Install TypeScript, linter and Jest
yarn add -D typescript @types/node ts-node
yarn add -D eslint @typescript-eslint/parser @typescript-eslint/eslint-plugin
yarn add -D jest ts-jest @types/jest

# Get a .gitignore
wget https://raw.githubusercontent.com/metachris/typescript-boilerplate/master/.gitignore

# Get a tsconfig.json with some defaults (adapt as needed)
wget https://raw.githubusercontent.com/metachris/typescript-boilerplate/master/tsconfig.json

# Alternatively you can create a fresh tsconfig.json (with extensive docstrings)
tsc --init

# Get a .eslintrc.js
wget https://raw.githubusercontent.com/metachris/typescript-boilerplate/master/.eslintrc.js

# Get a jest.config.json, for ts-jest to run the tests without a separate typescript compile step
wget https://raw.githubusercontent.com/metachris/typescript-boilerplate/master/jest.config.js
```

## jest

```
yarn jest
```

## esbild

compile a large subset of TypeScript code. You can use it to bundle both for Node.js as well as for browsers

* options
  * --watch option to rebuild whenever a file changed

```
yarn add -D esbuild

# Compile and bundle
yarn esbuild src/cli.ts --bundle --platform=node --outfile=dist/esbuild/cli.js

# Same, but minify and sourcemaps
yarn esbuild src/cli.ts --bundle --platform=node --minify --sourcemap=external --outfile=dist/esbuild/cli.js

# Run the bundled output
node dist/esbuild/cli.js

# Bundle for browsers
yarn esbuild src/browser.ts --bundle --outfile=dist/esbuild/browser.js
```

## TypeDoc

```
arn add -D typedoc
```
