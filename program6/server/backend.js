const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));

app.get("/", function (req, res) {
  res.sendFile(__dirname + "/index.html");
});

app.post("/login", function (req, res) {
  var name = req.body.name;
  var rollno = req.body.rollno;
  var department = req.body.department;

  res.send(
    "<h1>Name: " +
      name +
      "</h1>" +
      "<p>Roll No: " +
      rollno +
      "</p>" +
      "<p>Department: " +
      department +
      "</p>",
  );
});

app.listen(3000, function () {
  console.log("Server Running on http://localhost:3000");
});