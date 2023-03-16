import React, {useState}  from "react";
import {ethers} from 'ethers';
import './App.css';


const MetaMask = () => {

    const [errorMessage, setErrorMessage] = useState(null);
    const [defaultAccount, setDefaultAccount] = useState(null);
    const [userBalance, setUserBalance] = useState(null);


    const connectWallet = () => {
        if (window.ethereum) {
            window.ethereum.request({method: 'eth_requestAccounts'})
            .then(result => {
                accountChanged([result[0]])
            })
        } else {
            setErrorMessage('Install MetaMask please!!')
        }
    }

    const accountChanged = (accountName) => {
        setDefaultAccount(accountName)
        getUserBalance(accountName)
    }

    const getUserBalance = (accountAddress) => {
        window.ethereum.request({method: 'eth_getBalance', params: [String(accountAddress), "latest"]})
        .then(balance => {
            setUserBalance(ethers.formatEther(balance));
        })
    }

    async function sendTransaction(e) {
        let params = [{
            from: "0xB5F8516e3A05e9AdB50140997F7914f07FA9Da66",
            to: e.target.to_address.value,
            gas: Number(21000).toString(16),
            gasPrice: Number(2500000).toString(16),
            value: Number(1000000000000000).toString(16),
        }]

        let result = await window.ethereum.request({method: "eth_sendTransaction", params}).catch((err) => {
            console.log(err)
        })
    }

    async function productPicker(e) {
        let sales_value;

        if(e.target.product_form.value == "product1") {
            sales_value = 1000000000000000
        };
        if(e.target.product_form.value == "product2") {
            sales_value = 2000000000000000
        };
        if(e.target.product_form.value == "product3") {
            sales_value = 3000000000000000
        };

        let params = [{
            from: "0xB5F8516e3A05e9AdB50140997F7914f07FA9Da66",
            to: "0xBB761b64cF6afc6A085Eb27b7C351EF0aF2a084C",
            gas: Number(21000).toString(16),
            gasPrice: Number(2500000).toString(16),
            value: Number(sales_value).toString(16),
        }]

        let result = await window.ethereum.request({method: "eth_sendTransaction", params}).catch((err) => {
            console.log(err)
        })
    }

    return (
        <div>
            <br></br><br></br><br></br><br></br>
            <h1>MetaMask Wallet Connection</h1>
            <button onClick={connectWallet}> Connect Wallet Button  </button>
            <h3>Address: {defaultAccount}</h3>
            <h3>Balance: {userBalance}</h3>


            <form onSubmit={sendTransaction}>

                <h3>Enter Transaction Address: </h3>
                <input type="text" name="to_address" placeholder="Address: "/><br/>

                <input type="submit" value="Submit"/>

            </form>

            
            {/* <form onSubmit={productPicker}>

                <label>Pick Your Product:
                    <select value="product_form" id="product_form">
                        <option value="product1">💻 Product1</option>
                        <option value="product2">🎧 Product2</option>
                        <option value="product3">🎹 Product3</option>
                    </select>

                    <input type="submit" value="Submit"/>
                </label>

            </form> */}

            {errorMessage}
        </div>
    )
}

export default MetaMask;