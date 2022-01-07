import { getAttendedCount } from "./get-attended-count";

export default async function eligibleColor() {
    await getAttendedCount();
    let attendance_count = $("#attended-count").html();

        if (attendance_count < 5) {
            $("#attended-count").css("color", "red");
        } else if (attendance_count >= 5 && attendance_count < 10) {
            $("#attended-count").css("color", "orange");
            $("#first").css("font-weight", "900"); 
            $("#first").css("font-size", "18px"); 
            $("#first").css("color", "orange")     
        } else if (attendance_count >= 10 && attendance_count < 15) {
            $("#attended-count").css("color", "#d30069");
            $("#second").css("font-weight", "900"); 
            $("#second").css("font-size", "18px"); 
            $("#second").css("color", "#d30069")    
        } else if (attendance_count >= 15 && attendance_count < 20) {
            $("#attended-count").css("color", "#cbf542");
            $("#third").css("font-weight", "900"); 
            $("#third").css("font-size", "18px"); 
            $("#third").css("color", "#cbf542")     
        } else if (attendance_count == 20) {
            $("#attended-count").css("color", "#59ff8b");
            $("#grand").css("font-weight", "900"); 
            $("#grand").css("font-size", "18px"); 
            $("#grand").css("color", "#59ff8b")    
        }
}