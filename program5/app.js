const fs = require("fs");

const filename = "sample.txt";

const data = `
Employee Name: Batman
Employee ID: 12345
`;

fs.writeFile(filename, data, function (err) {
  if (err) {
    console.log(err);
  } else {
    console.log("File created");

    fs.readFile(filename, function (err, content) {
      if (err) {
        console.log(err);
      } else {
        console.log(content);
      }
    });
  }
  console.log(data);
});
