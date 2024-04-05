import { Application } from '@hotwired/stimulus'
import '@hotwired/strada'

const Stimulus = Application.start()

// Configure Stimulus development experience
Stimulus.debug = false

window.Stimulus = Stimulus

export { Stimulus }
