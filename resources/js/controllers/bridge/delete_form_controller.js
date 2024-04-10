import { BridgeComponent, BridgeElement } from "@hotwired/strada"

// Connects to data-controller="bridge--delete-form"
export default class extends BridgeComponent {
    static component = "delete-form"
    static targets = ["submit"]

    connect() {
        super.connect()
        this.notifyBridgeOfConnect()
    }

    notifyBridgeOfConnect() {
        const submitButton = new BridgeElement(this.submitTarget)
        const submitTitle = submitButton.title

        this.send("connect", { submitTitle }, () => {
            this.submitTarget.click()
        })
    }

    submitStart(event) {
        this.submitTarget.disabled = true
        this.send("submitDisabled")
    }

    submitEnd(event) {
        this.submitTarget.disabled = false
        this.send("submitEnabled")
    }
}
