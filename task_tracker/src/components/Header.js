import React from 'react';
import Button from './Button';

const Header = ({title}) => {
const onClick = () =>{
    console.log('click click')
}

  return (
    <header className='header'>
    <h1>{title}</h1>
    <Button onClick={onClick}/>
    </header>
  )
}

export default Header;