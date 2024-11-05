const chatBody = document.querySelector(".chat-body");
const textInput = document.querySelector("#textInput");
const send = document.querySelector(".send");
const chatbotContainer = document.querySelector(".container111");



send.addEventListener("click", () => renderUserMessage());

textInput.addEventListener("keyup", (event) => {
    if (event.keyCode === 13) {
        renderUserMessage();
    }
});

const renderUserMessage = () => {
    const userInput = textInput.value.trim();
    if (userInput) {
        renderMessageEle(userInput, "user");
        textInput.value = "";
        setTimeout(() => {
            renderChatBotResponse(userInput);
            setScrollPosition();
        }, 600);
    }
};

const renderChatBotResponse = (userInput) => {
    const res = getChatBotResponse(userInput);
    renderMessageEle(res);
};


const renderMessageEle = (txt, type) => {
    const messageEle = document.createElement("div");
    const txtNode = document.createTextNode(txt);
    messageEle.classList.add(type === "user" ? "user-message" : "chatbot-message");
    messageEle.style.maxWidth = "80%"; 
    messageEle.style.wordWrap = "break-word"; 
    messageEle.style.whiteSpace = "pre-wrap"; 
    messageEle.append(txtNode);
    chatBody.prepend(messageEle);
};

const getChatBotResponse = (userInput) => {
    const userInputLower = userInput.toLowerCase();

    for (const key in responseObj) {
        if (userInputLower.includes(key.toLowerCase())) {
            return responseObj[key];
        }
    }

    return "I do not understand";
};
const setScrollPosition = () => {
    if (chatBody.scrollHeight > 0) {
        chatBody.scrollTop = chatBody.scrollHeight;
    }
};
const toggleChatbot = () => {
    const chatbotContainer = document.querySelector(".container111");
    if (chatbotContainer.style.visibility === "hidden" || !chatbotContainer.style.visibility) {
        chatbotContainer.style.visibility = "visible";
    } else {
        chatbotContainer.style.visibility = "hidden";
    }
};