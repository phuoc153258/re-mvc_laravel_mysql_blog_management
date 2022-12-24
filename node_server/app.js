const express = require("express");
const app = express();
const { v4: uuidv4 } = require("uuid");
const port = process.env.port || 3000;
const axios = require("axios");

const server = app.listen(`${port}`, () => {
    console.log(`Server started on port ${port}`);
});

const io = require("socket.io")(server, {
    cors: { origin: "*" },
});

io.on("connection", (socket) => {
    console.log("Client connected!");

    socket.on("like-comment", async (data) => {
        const response = await axios({
            method: "post",
            url: `http://localhost:8000/api/comments/${data.id}/users/${data.user_id}`,
            headers: {
                Authorization: data.token,
            },
        });
        io.emit("like-comment-response", response.data);
    });

    socket.on("post-comment", async (value) => {
        const { comment, parent_id } = value;
        const response = await axios({
            method: "post",
            url: `http://localhost:8000/api/blogs/views/${value.slug}/comments`,
            data: {
                comment,
                parent_id,
            },
            headers: {
                Authorization: value.token,
            },
        });
        io.emit("post-comment-response", response.data);
    });

    socket.on("disconnect", () => {
        console.log("Client disconnected!");
    });
});
