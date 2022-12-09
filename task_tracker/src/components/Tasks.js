const tasks = [
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



const Tasks = () => {
  return (
    <>
    {tasks.map((task) => (
    <h3 key={task.id}>{task.text}</h3>
   ))}
   </>
  )
}

export default Tasks