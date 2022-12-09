import Header from './components/Header'
import Tasks from './components/Tasks'
import { useState } from 'react'


function App() {
  const [tasks, setTasks] = useState(
    [
        {
        id: 1,
        text: 'Doctors Appt',
        day: 'April 29th at 2pm',
        reminder: true
        },
        {
        id:2,
        text: 'Meeting',
        day: 'May 21st at 5pm',
        reminder:true,
        },
        
        ]
)
  

  return (
    <div className="container">
      <Header title='Task Tracker'/>
      <Tasks tasks={tasks} />
     
    </div>
  );
}

export default App;

