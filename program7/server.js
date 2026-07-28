const express = require("express");
const mongoose = require("mongoose");

const app = express();

app.use(express.urlencoded({ extended: true }));

// Start Server
app.listen(3000, function () {
  console.log("Server is running on port 3000");
});

// Connect MongoDB
mongoose
  .connect("mongodb://localhost:27017/EmployeeDB")
  .then(() => console.log("Connected to MongoDB"))
  .catch((err) => console.log(err));

// Employee Model
const Employee = mongoose.model("Employee", {
  empid: String,
  empname: String,
  department: String,
});

// Home Page
app.get("/", function (req, res) {
  res.sendFile(__dirname + "/index.html");
});

// Add Employee
app.post("/add", async function (req, res) {
  try {
    await Employee.create({
      empid: req.body.empid,
      empname: req.body.empname,
      department: req.body.department,
    });

    res.send("Employee added successfully");
  } catch (err) {
    console.log(err);
    res.send("Error adding employee");
  }
});
