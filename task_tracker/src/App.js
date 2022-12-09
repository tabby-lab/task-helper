import Header from './components/Header'


function App() {
  const name = 'Brad';
  

  return (
    <div className="container">
      <Header title='hello'/>
      <h2>hello</h2>
      <h3>{name}</h3>
    </div>
  );
}

export default App;

