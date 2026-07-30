const express = require("express");
const mongoose = require("mongoose");

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

mongoose
  .connect("mongodb://127.0.0.1:27017/EmployeeDB")
  .then(() => console.log("Connected to MongoDB"))
  .catch((err) => console.log(err));

const EmployeeSchema = new mongoose.Schema({
  empid: String,
  empname: String,
  department: String,
});

const Employee = mongoose.model("Employee", EmployeeSchema);

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/index.html");
});

app.post("/add", async (req, res) => {
  try {
    await Employee.create({
      empid: req.body.empid,
      empname: req.body.empname,
      department: req.body.department,
    });

    res.redirect("/employees");
  } catch (err) {
    console.log(err);
    res.send("Error adding employee.");
  }
});

app.get("/employees", async (req, res) => {
  try {
    const employees = await Employee.find();

    let result = `
    <html>
    <body>
    <h2>Employee Details</h2>

    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    `;

    employees.forEach((employee) => {
      result += `
      <tr>
        <td>${employee.empid}</td>
        <td>${employee.empname}</td>
        <td>${employee.department}</td>
        <td><a href="/delete/${employee._id}">Delete</a></td>
      </tr>
      `;
    });

    result += `
    </table>
    </body>
    </html>
    `;

    res.send(result);
  } catch (err) {
    console.log(err);
    res.send("Error fetching employees.");
  }
});

app.get("/delete/:id", async (req, res) => {
  try {
    await Employee.findByIdAndDelete(req.params.id);
    res.redirect("/employees");
  } catch (err) {
    console.log(err);
    res.send(err);
  }
});

app.listen(3000, () => {
  console.log("Server is running on http://localhost:3000");
});

