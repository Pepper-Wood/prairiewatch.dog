const validateSchema = require('yaml-schema-validator')
const path = require("path");
const fs = require("fs");

let args = process.argv.slice(2);
if (args.length != 1) {
  console.log("Missing argument 'schemaType'.");
  process.exit(1);
}
let schemaType = args[0];

const directoryPath = path.join(__dirname, "../../database/" + schemaType);

let errorCount = 0;
let errors = "";
let index = 0;

fs.readdir(directoryPath, function(err, files) {
  if (err) {
    console.log("Error getting directory information.");
    process.exit(1);
  } else {
    files.forEach(function(file) {
      index += 1;
      if (index % 50 == 0) {
        process.stdout.write("\n");
      }
      result = validateSchema('../../database/' + schemaType + '/' + file, {
        schemaPath: '../../database/schemas/' + schemaType + '.yml',
        logLevel: 'none'
      });
      if (result.length == 0) {
        process.stdout.write(".");
      } else {
        process.stdout.write("F");
        errors += '\n' + file + '\n';
        for (let i = 0; i < result.length; i++) {
          errors += "  " + result[i]['message'] + "\n";
        }
        errorCount += 1;
      }
    });
    if (errorCount == 0) {
      console.log("\n\n✅ No errors found.");
      process.exit();
    }
    console.log("\n\n❌ " + errorCount + " errors found:");
    console.log(errors)
    process.exit(1);
  }
});
