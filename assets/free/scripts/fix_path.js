const fs = require('fs');
resolve = require('path').resolve
sourcePath = resolve(process.argv[2])
const rawData = fs.readFileSync(sourcePath + '/asset-manifest.json');
const jsonData = JSON.parse(rawData);
let jsFilePath = sourcePath + jsonData['files']['main.js']
jsFilePath = jsFilePath.replaceAll('/', '\\')
let jsFileData = fs.readFileSync(jsFilePath)
jsFileData = jsFileData.toString().replaceAll('return"static/', 'return wdd_static_url+"/')
fs.writeFileSync(jsFilePath, jsFileData)
console.log('DONE')