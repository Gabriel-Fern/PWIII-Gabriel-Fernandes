import { useState } from 'react';
import './App.css';

// Componente Square: representa cada célula do tabuleiro
function Square({ value, onSquareClick, isWinning }) {
  return (
    <button
      className={`square${isWinning ? ' winning' : ''}`}
      onClick={onSquareClick}
    >
      {value}
    </button>
  );
}

// Componente Board: representa o tabuleiro 3x3
function Board({ xIsNext, squares, onPlay }) {
  function handleClick(i) {
    // Impede clique se já houver vencedor ou casa ocupada
    if (calculateWinner(squares) || squares[i]) {
      return;
    }
    const nextSquares = squares.slice();
    if (xIsNext) {
      nextSquares[i] = 'X';
    } else {
      nextSquares[i] = 'O';
    }
    onPlay(nextSquares);
  }

  const winnerInfo = calculateWinner(squares);
  const winner = winnerInfo ? winnerInfo.winner : null;
  const winningSquares = winnerInfo ? winnerInfo.line : [];

  let status;
  if (winner) {
    status = 'Vencedor: ' + winner;
  } else if (squares.every(Boolean)) {
    status = 'Empate! Nenhum vencedor.';
  } else {
    status = 'Próximo jogador: ' + (xIsNext ? 'X' : 'O');
  }

  return (
    <>
      <div className="status">{status}</div>
      <div className="board-row">
        <Square value={squares[0]} onSquareClick={() => handleClick(0)} isWinning={winningSquares.includes(0)} />
        <Square value={squares[1]} onSquareClick={() => handleClick(1)} isWinning={winningSquares.includes(1)} />
        <Square value={squares[2]} onSquareClick={() => handleClick(2)} isWinning={winningSquares.includes(2)} />
      </div>
      <div className="board-row">
        <Square value={squares[3]} onSquareClick={() => handleClick(3)} isWinning={winningSquares.includes(3)} />
        <Square value={squares[4]} onSquareClick={() => handleClick(4)} isWinning={winningSquares.includes(4)} />
        <Square value={squares[5]} onSquareClick={() => handleClick(5)} isWinning={winningSquares.includes(5)} />
      </div>
      <div className="board-row">
        <Square value={squares[6]} onSquareClick={() => handleClick(6)} isWinning={winningSquares.includes(6)} />
        <Square value={squares[7]} onSquareClick={() => handleClick(7)} isWinning={winningSquares.includes(7)} />
        <Square value={squares[8]} onSquareClick={() => handleClick(8)} isWinning={winningSquares.includes(8)} />
      </div>
    </>
  );
}

// Componente Game: gerencia o histórico e a viagem no tempo
export default function Game() {
  const [history, setHistory] = useState([Array(9).fill(null)]);
  const [currentMove, setCurrentMove] = useState(0);

  const xIsNext = currentMove % 2 === 0;
  const currentSquares = history[currentMove];

  function handlePlay(nextSquares) {
    const nextHistory = [...history.slice(0, currentMove + 1), nextSquares];
    setHistory(nextHistory);
    setCurrentMove(nextHistory.length - 1);
  }

  function jumpTo(nextMove) {
    setCurrentMove(nextMove);
  }

  const moves = history.map((squares, move) => {
    let description;
    if (move > 0) {
      description = 'Ir para jogada #' + move;
    } else {
      description = 'Ir para o início';
    }
    return (
      <li key={move}>
        <button className="move-btn" onClick={() => jumpTo(move)}>
          {description}
        </button>
      </li>
    );
  });

  return (
    <div className="game">
      <div className="game-header">
        <h1>Jogo da Velha</h1>
        <p className="subtitle">YAY</p>
      </div>
      <div className="game-body">
        <div className="game-board">
          <Board xIsNext={xIsNext} squares={currentSquares} onPlay={handlePlay} />
        </div>
        <div className="game-info">
          <h2>Histórico</h2>
          <ol className="move-list">{moves}</ol>
        </div>
      </div>
    </div>
  );
}

// Função auxiliar: calcula o vencedor
function calculateWinner(squares) {
  const lines = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];
  for (let i = 0; i < lines.length; i++) {
    const [a, b, c] = lines[i];
    if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
      return { winner: squares[a], line: [a, b, c] };
    }
  }
  return null;
}
