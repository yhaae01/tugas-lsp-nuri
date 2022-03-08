const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire({
		title: "Berhasil",
		text: "Data berhasil " + flashData,
		icon: "success",
		showCloseButton: true,
	});
}
