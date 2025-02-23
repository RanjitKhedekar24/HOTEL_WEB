const form = document.getElementById('booking-form');
const bookingList = document.getElementById('booking-ul');


let bookings = [];

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	const checkinDate = document.getElementById('checkin-date').value;
	const checkoutDate = document.getElementById('checkout-date').value;
	const roomType = document.getElementById('room-type').value;
	const numGuests = document.getElementById('num-guests').value;
	const name = document.getElementById('name').value;
	const email = document.getElementById('email').value;
	const phone = document.getElementById('phone').value;
        const aadhar = document.getElementById('aadhar').value;
	
	// Validate form data
	if (!checkinDate ||!checkoutDate ||!roomType ||!numGuests ||!name ||!email ||!phone) {
		alert('Please fill in all fields');
		return;
	}
	
	// Create a new booking object
	const booking = {
		checkinDate,
		checkoutDate,
		roomType,
		numGuests,
		name,
		email,
		phone,
                aadhar
	};
});