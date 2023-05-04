//SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract Carpooling {
    function transferEther(address payable receiver) public payable {
        require(msg.value > 0, "Amount to transfer must be greater than 0");
        require(receiver != address(0), "Invalid receiver address");

        receiver.transfer(msg.value);
    }
}