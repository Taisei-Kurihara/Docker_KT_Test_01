const ws = new WebSocket("ws://localhost:8080/chat");

ws.onopen = () => ws.send("Hello WebSocket");
ws.onmessage = e => console.log(e.data);
