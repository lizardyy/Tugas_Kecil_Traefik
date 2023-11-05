const express = require('express')
const app = express()
const PORT = 8083
const HOST = '0.0.0.0'

app.use(express.json()); // Add this line to enable JSON parsing
// App
app.get('/', (req, res) => {
    res.send('Hello World')
});

app.get('/pinevaley', (req, res) => {
    res.send("This is Pine Valley Hospital Service")
});

app.post('/pinevaley/getdoctor', (req, res) => {
    try {
        const doctorType = req.body.doctorType;
        if (doctorType == 'Ophthalmologist') {
            const doctors = {
                "doctors": {
                    "doctor": [
                        {
                            "name": "John Mathew",
                            "time": "07:30 AM",
                            "hospital": "pineValley"
                        },
                        {
                            "name": "Roma Katherine",
                            "time": "04:30 PM",
                            "hospital": "pineValley"
                        }
                    ]
                }
            };
            res.json(doctors);
        }
        else if (doctorType == 'Physician'){
            const doctors = {
                "doctors": {
                    "doctor": [
                        {
                            "name": "Geln Ivan",
                            "time": "05:30 PM",
                            "hospital": "pineValley"
                        },
                        {
                            "name": "Daniel Lewis",
                            "time": "05:30 PM",
                            "hospital": "pineValley"
                        }
                    ]
                }
            };
            res.json(doctors);
        }
        else if (doctorType == 'Pediatrician') {
            const doctors = {
                "doctors": {
                    "doctor": [
                        {
                            "name": "Bob Watson",
                            "time": "07:30 AM",
                            "hospital": "pineValley"
                        },
                        {
                            "name": "Wilson Mcdonald",
                            "time": "07:30 AM",
                            "hospital": "pineValley"
                        }
                    ]
                }
            };
            res.json(doctors);
        }
        else {
            // Handle other doctor types or provide an appropriate response
            res.json({ message: 'No doctors available for the provided doctorType' });
        }
    } catch (error) {
        res.status(500).json({ error: 'Internal Server Error' });
    }
});
app.listen(PORT, HOST)
console.log(`Our app running on http://${HOST}:${PORT}`)