// import "./styles/App.css";
import Home from "./pages/Home";
import Login from "./pages/Login";
import RecipeCard from "./components/RecipeCard";

const App = () => {
  return (
    <div className="App">
      <Home />
      <RecipeCard/>
      <Login />
    </div>
  );
};

export default App;